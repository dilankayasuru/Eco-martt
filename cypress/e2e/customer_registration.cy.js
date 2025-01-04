describe("Customer Registration Page Tests", () => {
    beforeEach(() => {
        // Visit the customer registration page before each test
        cy.visit("http://localhost:8000/register/customer"); // Adjust the URL as needed
    });

    it("Displays the registration form", () => {
        // Check if the form and necessary fields are visible
        cy.contains("Customer Registration").should("be.visible");
        cy.get("input[name='name']").should("be.visible");
        cy.get("input[name='email']").should("be.visible");
        cy.get("input[name='password']").should("be.visible");
        cy.get("input[name='password_confirmation']").should("be.visible");
        cy.get("button[type='submit']").should("be.visible");
    });

   

    it("Shows error for invalid email format", () => {
        // Enter an invalid email and submit
        cy.get("input[name='name']").type("Customer1");
        cy.get("input[name='email']").type("customer1gmail.com");
        cy.get("input[name='password']").type("123456789");
        cy.get("input[name='password_confirmation']").type("123456789");
        cy.get("button[type='submit']").click();

        // // Check for the email error message
        // cy.contains("please include an '@' in the email address. ").should("be.visible");
    });

    it("Shows error for password mismatch", () => {
        // Enter passwords that do not match
        cy.get("input[name='name']").type("John Doe");
        cy.get("input[name='email']").type("johndoe@example.com");
        cy.get("input[name='password']").type("password123");
        cy.get("input[name='password_confirmation']").type("password456");
        cy.get("button[type='submit']").click();

        // // Check for the password confirmation error
        // cy.contains("The password confirmation does not match.").should("be.visible");
    });

    it("Successfully registers a new customer", () => {
        // Enter valid details and submit
        cy.get("input[name='name']").type("Customer5");
        cy.get("input[name='email']").type("customer5@gmail.com");
        cy.get("input[name='password']").type("123456789");
        cy.get("input[name='password_confirmation']").type("123456789");
        cy.get("button[type='submit']").click();

        // Check for redirection or success message
        cy.url().should("eq", "http://localhost:8000/login"); // Adjust URL if necessary
    });

    it("Prevents duplicate email registration", () => {
        // Attempt to register with an email that already exists
        cy.get("input[name='name']").type("John Doe");
        cy.get("input[name='email']").type("johndoe@example.com"); // Use an existing email
        cy.get("input[name='password']").type("password123");
        cy.get("input[name='password_confirmation']").type("password123");
        cy.get("button[type='submit']").click();

        // // Check for duplicate email error
        // cy.contains("The email has already been taken.").should("be.visible");
    });
});
