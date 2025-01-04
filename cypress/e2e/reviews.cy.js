describe("Support and Reviews Page", () => {
    beforeEach(() => {
        // Visit the support and reviews page
        cy.visit("http://localhost:8000/reviews"); // Replace with the actual route
    });

    it("Loads the Support and Reviews page successfully", () => {
        // Check the page title
        cy.title().should("include", "Support and Reviews");

        // Verify the page heading
        cy.contains("h1", "Frequently Asked Questions").should("be.visible");
    });

    it("Toggles FAQ answers correctly", () => {
        // Check FAQ functionality
        cy.contains("What are your support hours?").click();
        cy.contains("We are available Monday to Friday from 9 AM to 6 PM").should("be.visible");

        cy.contains("What are your support hours?").click();
        cy.contains("We are available Monday to Friday from 9 AM to 6 PM").should("not.be.visible");
    });

    // it("Submits a review with valid inputs", () => {
    //     // Fill the review form
    //     cy.get("input[name='rating']").type("5");
    //     cy.get("textarea[name='review']").type("Excellent service and very eco-friendly!");

    //     // Target the submit button specifically within the review form
    //     cy.get("form[action='/reviews/store'] button[type='submit']").click();

    //     // Verify the success message
    //     cy.contains("Your review has been submitted successfully.").should("be.visible");
    // });
    

    it("Displays existing reviews correctly", () => {
        // Check if reviews are displayed
        cy.contains("What our customers say:").should("be.visible");

        // Verify at least one review is displayed
        cy.get(".review").should("have.length.greaterThan", 0);
    });

  
   
});
