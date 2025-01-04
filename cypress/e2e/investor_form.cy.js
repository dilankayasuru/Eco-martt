describe("Investor Form Tests", () => {
    // Visit the Investor Page Before Each Test
    beforeEach(() => {
        cy.visit("http://localhost:8000/investors");
    });

    // Test 1: Check If Page Loads
    it("Loads the Investor Form Page", () => {
        cy.contains("Join as an Investor").should("be.visible");
    });

    // Test 2: Fill the Form and Submit
    it("Submits the Investor Form Successfully", () => {
        cy.get('input[name="name"]').type("John Doe");
        cy.get('input[name="email"]').type("john.doe@example.com");
        // cy.get('input[name="logo"]').selectFile(
        //     "cypress/fixtures/download (1).png "
        // );
        cy.get('textarea[name="purpose"]').type(
            "Partnering for sustainability"
        );
        cy.get('button[type="submit"]').click();
    });
});
