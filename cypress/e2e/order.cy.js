// Cypress test cases for the Orders Page

describe('Orders Page Tests', () => {

    beforeEach(() => {
        // Visit the orders page before each test
        cy.visit('http://127.0.0.1:8000/orders');
    });

    it('should display the navbar correctly', () => {
        cy.get('.navbar').should('exist');
        cy.get('.logo').should('have.text', 'Eco - Mart');
        cy.get('.nav-links a').should('have.length', 5);
    });

    it('should display the orders list if orders exist', () => {
        cy.get('.order-card').should('exist').and('have.length.greaterThan', 0);
    });

    it('should display correct order details', () => {
        cy.fixture('orders').then((orders) => {
            cy.intercept('GET', 'http://127.0.0.1:8000/orders', { body: orders }).as('loadOrders');
            cy.visit('http://127.0.0.1:8000/orders');
            cy.wait('@loadOrders');

            orders.forEach((order, index) => {
                cy.get(`.order-card:eq(${index}) h2`).should('contain.text', `Order ID: ${order.id}`);
                cy.get(`.order-card:eq(${index}) .order-total`).should('contain.text', `Total: LKR ${order.total_amount.toFixed(2)}`);
                cy.get(`.order-card:eq(${index})`).within(() => {
                    order.orderItems.forEach((item) => {
                        cy.contains(item.product.name).should('exist');
                        cy.contains(`Quantity: ${item.quantity}`).should('exist');
                    });
                });
            });
        });
    });

    it('should display the correct order status quote', () => {
        cy.fixture('orders').then((orders) => {
            cy.intercept('GET', 'http://127.0.0.1:8000/orders', { body: orders }).as('loadOrders');
            cy.visit('http://127.0.0.1:8000/orders');
            cy.wait('@loadOrders');

            orders.forEach((order, index) => {
                const statusQuotes = {
                    pending: "Your order is being processed. Thank you for your patience.",
                    confirmed: "Your order has been confirmed. Stay tuned for updates!",
                    shipped: "Your order is on its way. Get ready!",
                    delivered: "Your order has been delivered. Enjoy your purchase!",
                    cancelled: "We’re sorry, your order was cancelled."
                };
                cy.get(`#quote-${order.id}`).should('have.text', statusQuotes[order.status] || 'Order status unknown.');
            });
        });
    });

   
});
