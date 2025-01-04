// Cypress test cases for the Product Details and Cart Page

describe('Product Details and Cart Page Tests', () => {

    beforeEach(() => {
        // Visit the product details page before each test
        cy.visit('http://127.0.0.1:8000/products/4'); // Example product ID
    });

    it('should display product details correctly', () => {
        // cy.get('.product-info h1').should('exist').and('have.text', 'Product Name'); // Update with actual product name
        cy.get('.product-info p').should('contain.text', 'Description:');
        cy.get('.product-info p').should('contain.text', 'Category:');
        cy.get('.product-info p').should('contain.text', 'Price:');
        cy.get('.product-info p').should('contain.text', 'Available Quantity:');
        cy.get('.product-info p').should('contain.text', 'Supplier:');
    });

    it('should add a product to the cart', () => {
        cy.get('input[name="quantity"]').clear().type('4');
        cy.get('form.cart-form button').contains('Add to Cart').click();

        // Verify success message
        cy.contains('Product added to cart successfully').should('exist');

        // Visit the cart page
        cy.visit('http://127.0.0.1:8000/cart');

        // Check if the product is listed in the cart
        cy.get('.cart-item').should('exist').and('have.length.greaterThan', 0);
    });

    describe('Cart Page Tests', () => {

        beforeEach(() => {
            // Visit the cart page before each test
            cy.visit('http://127.0.0.1:8000/cart');
        });

        it('should display the navbar correctly', () => {
            cy.get('.navbar').should('exist');
            cy.get('.logo').should('have.text', 'Eco - Mart');
            cy.get('.nav-links a').should('have.length', 5);
        });

        it('should display cart items when products are added', () => {
            cy.fixture('cartItems').then((cart) => {
                cy.intercept('GET', '/cart', { body: cart }).as('loadCart');
                cy.visit('http://127.0.0.1:8000/cart');
                cy.wait('@loadCart');
                
                cy.get('.cart-item').should('have.length', cart.length);
                cart.forEach((item, index) => {
                    cy.get(`.cart-item:eq(${index}) h3`).should('have.text', item.name);
                    cy.get(`.cart-item:eq(${index})`).should('contain.text', `LKR ${item.price.toFixed(2)}`);
                });
            });
        });

        it('should update the quantity of a product', () => {
            cy.get('input[name="quantity"]').first().clear().type('5');
            cy.get('form[action*="cart.update"] button').first().click();
            
            cy.contains('success').should('exist');
        });

        it('should remove a product from the cart', () => {
            cy.get('form[action*="cart.remove"] button').first().click();
            cy.contains('success').should('exist');
        });

        it('should calculate and display the correct total amount and discount', () => {
            cy.fixture('cartItems').then((cart) => {
                const totalAmount = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
                const discount = totalAmount >= 3000 ? totalAmount * 0.1 : 0;
                const payableAmount = totalAmount - discount;

                cy.get('.cart-summary h2').eq(0).should('contain.text', `Total Amount: LKR ${totalAmount.toFixed(2)}`);

                if (discount > 0) {
                    cy.get('.cart-summary h3').should('contain.text', `Discount (10%): -LKR ${discount.toFixed(2)}`);
                }

                cy.get('.cart-summary h2').eq(1).should('contain.text', `Total Amount Payable: LKR ${payableAmount.toFixed(2)}`);
            });
        });

        it('should navigate to the checkout page when clicking Proceed to Checkout', () => {
            cy.get('.cart-action a').contains('Proceed to Checkout').click();
            cy.url().should('include', 'http://127.0.0.1:8000/checkout');
        });

        it('should navigate back to products page when clicking Back to Products', () => {
            cy.get('.cart-action a').contains('Back to Products').click();
            cy.url().should('include', 'http://127.0.0.1:8000/products');
        });

        it('should display the correct discount quote', () => {
            cy.fixture('cartItems').then((cart) => {
                const totalAmount = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
                const expectedQuote = totalAmount >= 3000 ?
                    'Great News! If you spend over LKR 3000, you’ll receive a 10% discount!' :
                    `Add more products worth LKR ${(3000 - totalAmount).toFixed(2)} to get a 10% discount!`;

                cy.get('#discount-quote').should('have.text', expectedQuote);
            });
        });

    });
});
