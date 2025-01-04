describe("Supplier Registration Page Tests", () => {
    beforeEach(() => {
        // Visit the supplier registration page before each test
        cy.visit("http://localhost:8000/register/supplier"); // Adjust the URL to your application
    });

    it("Displays the registration form", () => {
        // Check if all form elements are visible
        cy.contains("Supplier Registration").should("be.visible");
        cy.get("input[name='name']").should("be.visible");
        cy.get("input[name='company_name']").should("be.visible");
        cy.get("input[name='email']").should("be.visible");
        cy.get("input[name='password']").should("be.visible");
        cy.get("input[name='password_confirmation']").should("be.visible");
        cy.get("input[name='certification_name']").should("be.visible");
        cy.get("input[name='certification_image']").should("be.visible");
        cy.get("input[name='valid_time_period']").should("be.visible");
        cy.get("button[type='submit']").should("be.visible");
    });

   

    it("Shows error for invalid email format", () => {
        // Enter invalid email format
        cy.get("input[name='name']").type("Supplier4");
        cy.get("input[name='company_name']").type("Eco Supplies Ltd.");
        cy.get("input[name='email']").type("supplier4example"); // Invalid email
        cy.get("input[name='password']").type("password123");
        cy.get("input[name='password_confirmation']").type("password123");
        cy.get("input[name='certification_name']").type("ISO 14001");
        cy.get("input[name='certification_image']").selectFile("cypress/fixtures/download (1).png");
        cy.get("input[name='valid_time_period']").type("2025-12-31");
        cy.get("button[type='submit']").click();

        // // Check for email error message
        // cy.contains("The email must be a valid email address.").should("be.visible");
    });

    it("Shows error for password mismatch", () => {
        // Enter passwords that do not match
        cy.get("input[name='name']").type("Supplier4");
        cy.get("input[name='company_name']").type("Eco Supplies Ltd.");
        cy.get("input[name='email']").type("supplier4@example.com");
        cy.get("input[name='password']").type("password123");
        cy.get("input[name='password_confirmation']").type("password456");
        cy.get("input[name='certification_name']").type("ISO 14001");
        cy.get("input[name='certification_image']").selectFile("cypress/fixtures/download (1).png");
        cy.get("input[name='valid_time_period']").type("2025-12-31");
        cy.get("button[type='submit']").click();

        // // Check for password mismatch error
        // cy.contains("The password confirmation does not match.").should("be.visible");
    });

    it("Successfully registers a new supplier", () => {
        // Fill the form with valid data and submit
        cy.get("input[name='name']").type("Supplier6");
        cy.get("input[name='company_name']").type("Eco Supplies Ltd.");
        cy.get("input[name='email']").type("supplier6@example.com");
        cy.get("input[name='password']").type("password123");
        cy.get("input[name='password_confirmation']").type("password123");
        cy.get("input[name='certification_name']").type("ISO 14001");
        cy.get("input[name='certification_image']").selectFile("cypress/fixtures/download (1).png");
        cy.get("input[name='valid_time_period']").type("2025-12-31");
        cy.get("button[type='submit']").click();

        // Check for redirection and success message
        cy.url().should("eq", "http://localhost:8000/login"); // Adjust URL as needed
    });

    it("Prevents duplicate email registration", () => {
        // Attempt to register with an existing email
        cy.get("input[name='name']").type("John Doe");
        cy.get("input[name='company_name']").type("Eco Supplies Ltd.");
        cy.get("input[name='email']").type("supplier6@example.com"); // Existing email
        cy.get("input[name='password']").type("password123");
        cy.get("input[name='password_confirmation']").type("password123");
        cy.get("input[name='certification_name']").type("ISO 14001");
        cy.get("input[name='certification_image']").selectFile("cypress/fixtures/download (1).png");
        cy.get("input[name='valid_time_period']").type("2025-12-31");
        cy.get("button[type='submit']").click();

        // // Check for duplicate email error
        // cy.contains("The email has already been taken.").should("be.visible");
    });
});


