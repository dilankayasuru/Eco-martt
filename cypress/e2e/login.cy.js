describe("Login Page Tests", () => {
    const quotes = [
        "Welcome back! Your sustainable journey continues.",
        "Login to your account and make eco-friendly choices.",
        "Secure your account with us today.",
        "Together, let's build a greener future.",
        "Every login brings you closer to eco-friendly living.",
        "Making sustainable choices is just a click away.",
    ];

    beforeEach(() => {
        // Visit the login page before each test
        cy.visit("http://localhost:8000/login"); // Adjust the URL as per your application
    });

    it("Loads the login page successfully", () => {
        // Check if the page contains the heading
        cy.contains("Login").should("be.visible");

        // Verify the presence of form elements
        cy.get("input[name='email']").should("exist");
        cy.get("input[name='password']").should("exist");
        cy.get("button[type='submit']").should("contain", "Login");
    });

    it("Displays error messages for invalid credentials", () => {
        // Enter invalid credentials
        cy.get("input[name='email']").type("invalid@example.com");
        cy.get("input[name='password']").type("wrongpassword");
        cy.get("button[type='submit']").click();

        // Assert error message is shown
        cy.contains("Invalid email or password.").should("be.visible");
    });

    it("Logs in successfully with valid credentials", () => {
        // Enter valid credentials
        cy.get("input[name='email']").type("admin@gmail.com"); // Replace with valid email
        cy.get("input[name='password']").type("123456789"); // Replace with valid password
        cy.get("button[type='submit']").click();

        // Check redirection based on the role
        cy.url().should("not.eq", "http://127.0.0.1:8000/admin/dashboard"); // Ensure it redirects
    });

    it("Logs in successfully as Customer", () => {
        // Enter customer credentials
        cy.get("input[name='email']").type("customer1@gmail.com"); // Replace with valid customer email
        cy.get("input[name='password']").type("123456789"); // Replace with valid customer password
        cy.get("button[type='submit']").click();

        // Check redirection based on the customer role
        cy.url().should("match", /http:\/\/(localhost|127\.0\.0\.1):8000\/customer\/dashboard/);

    });

    it("Logs in successfully as Supplier", () => {
        // Enter supplier credentials
        cy.get("input[name='email']").type("supplier1@gmail.com"); // Replace with valid supplier email
        cy.get("input[name='password']").type("123456789"); // Replace with valid supplier password
        cy.get("button[type='submit']").click();

        // Check redirection based on the supplier role
        cy.url().should("match", /http:\/\/(localhost|127\.0\.0\.1):8000\/supplier\/dashboard/);
        
    });

    

    
});
