describe("Product Details Page", () => {
    const product = {
        name: "Organic Carrots",
        description: "Freshly harvested organic carrots are nutrient-rich root vegetables known for their sweet and earthy flavor. They are an excellent source of essential vitamins like A, C, K, and B6, supporting vision, immunity, and skin health. Packed with dietary fiber, they promote good digestion and heart health. Organic carrots are grown without synthetic pesticides or harmful chemicals, ensuring a healthier, more sustainable product. Their vibrant orange color comes from beta-carotene, a powerful antioxidant that helps fight free radicals. Enjoy them raw, roasted, or in soups and salads for a versatile, nutritious addition to your diet. Choose organic for better taste and environmental sustainability.",
        category: "Vegetables",
        price: 500,
        quantity: 93,
        supplier: "Supplier1",
    };

    beforeEach(() => {
        // Visit the product details page with a specific product ID
        cy.visit("http://localhost:8000/products/2"); // Replace "1" with a valid product ID
    });

    it("Loads the Product Details page successfully", () => {
        // Check the page title
        cy.title().should("include", product.name);

        // Check the product name is displayed
        cy.contains("h1", product.name).should("be.visible");
    });

    it("Displays product information correctly", () => {
        // Verify product details
        cy.contains(".product-description", product.description).should("be.visible");
        cy.contains("strong", "Category:").parent().should("contain.text", product.category);
        cy.contains("strong", "Price:").parent().should("contain.text", `$${product.price.toFixed(2)}`);
        cy.contains("strong", "Available Quantity:").parent().should("contain.text", product.quantity);
        cy.contains("strong", "Supplier:").parent().should("contain.text", product.supplier);

        // Verify product image is displayed
        cy.get(".product-image img")
            .should("have.attr", "alt", product.name)
            .and("have.attr", "src");
    });

    it("Adds the product to the cart successfully", () => {
        // Set quantity and add to cart
        cy.get("input[name='quantity']").clear().type("2");
        cy.get("button[type='submit']").click();

        // Verify redirection or success message
        cy.url().should("include", "/cart");
    });

    it("Limits quantity input to the available quantity", () => {
        // Input quantity greater than the available stock
        cy.get("input[name='quantity']").clear().type(product.quantity + 1);

        // Verify that the input value does not exceed max quantity
        cy.get("input[name='quantity']").should("have.attr", "max", `${product.quantity}`);
    });

    it("Redirects to the Products Index page when 'Back to Products' is clicked", () => {
        // Click the "Back to Products" button
        cy.get(".btn-back").click();

        // Verify redirection to the products index page
        cy.url().should("include", "/products");
    });
});
