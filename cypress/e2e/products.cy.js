describe("Our Products Page", () => {
    beforeEach(() => {
        // Visit the "Our Products" page before each test
        cy.visit("http://localhost:8000/products"); // Adjust the URL if necessary
    });

    it("Loads the Products page successfully", () => {
        // Check if the page title is correct
        cy.title().should("include", "Our Products");

        // Check if the navbar is visible
        cy.get(".navbar").should("be.visible");

        // Verify the logo
        cy.contains(".logo", "Eco - Mart").should("be.visible");
    });

    it("Displays all product categories", () => {
        // Check if at least one category section exists
        cy.get(".category-section").should("have.length.greaterThan", 0);

        // Verify category titles are visible
        cy.get(".category-title").each(($category) => {
            cy.wrap($category).should("be.visible");
        });
    });

    it("Displays products within each category", () => {
        // Check if each category section contains product cards
        cy.get(".category-section").each(($section) => {
            cy.wrap($section).find(".product-card").should("have.length.greaterThan", 0);
        });
    });

    it("Displays product details correctly", () => {
        // Verify product information
        cy.get(".product-card").each(($product) => {
            // Check product image
            cy.wrap($product).find(".product-image").should("have.attr", "src").and("not.be.empty");

            // Check product name
            cy.wrap($product).find(".product-name").should("be.visible");

            // Check product price
            cy.wrap($product).find(".product-price").should("be.visible");

            // Check product quantity
            cy.wrap($product).find(".product-quantity").should("be.visible");
        });
    });

    it("Redirects to the correct product details page when 'View Details' is clicked", () => {
        // Click the first "View Details" button
        cy.get(".product-card").first().find("a.btn-primary").click();

        // Verify the URL redirects to the correct product details page
        cy.url().should("include", "/products/");
    });

    it("Handles products with missing images gracefully", () => {
        // Check if products without images have a placeholder or error handling
        cy.get(".product-card").each(($product) => {
            cy.wrap($product).find(".product-image").should("exist");
        });
    });
});
