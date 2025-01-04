describe("Customer Profile Page Tests", () => {
    beforeEach(() => {
        // Login as a customer and visit the profile page
        cy.visit("http://localhost:8000/login"); // Replace with your login URL
        cy.get("input[name='email']").type("customer1@gmail.com"); // Replace with valid customer email
        cy.get("input[name='password']").type("123456789"); // Replace with valid customer password
        cy.get("button[type='submit']").click();

        // Redirect to the customer profile page
        cy.visit("http://localhost:8000/customer/profile"); // Replace with your profile page URL
    });

    it("Displays the profile page with correct details", () => {
        // Check if the profile page elements are visible
        cy.contains("Welcome").should("be.visible");
        cy.contains("Manage your profile details and account settings").should("be.visible");

        // Check profile details
        cy.get(".profile-details").within(() => {
            cy.contains("Name:").should("be.visible");
            cy.contains("Email:").should("be.visible");
        });
    });

    

    it("Updates profile details successfully", () => {
        // Update name and email
        cy.get("form[action*='profile/update']").within(() => {
            cy.get("input[name='name']").clear().type("Updated Customer");
            cy.get("input[name='email']").clear().type("updated_customer@example.com");
            cy.get("button[type='submit']").click();
        });

        // Check for success message
        cy.contains("Profile updated successfully.").should("be.visible");

        // Ensure the updated details are reflected
        cy.contains("Name: Updated Customer").should("be.visible");
        cy.contains("Email: updated_customer@example.com").should("be.visible");
    });

   

    // it("Shows error for incorrect current password", () => {
    //     // Enter incorrect current password
    //     cy.get("form[action*='profile/password/update']").within(() => {
    //         cy.get("input[name='current_password']").type("12345678");
    //         cy.get("input[name='new_password']").type("newpassword123");
    //         cy.get("input[name='new_password_confirmation']").type("newpassword123");
    //         cy.get("button[type='submit']").click();
    //     });

    //     // // Check for error message
    //     // cy.contains("The current password is incorrect.").should("be.visible");
    // });

    // it("Updates password successfully", () => {
    //     // Enter correct current password and new password
    //     cy.get("form[action*='profile/password/update']").within(() => {
    //         cy.get("input[name='current_password']").type("123456789"); // Replace with the current valid password
    //         cy.get("input[name='new_password']").type("newpassword123");
    //         cy.get("input[name='new_password_confirmation']").type("newpassword123");
    //         cy.get("button[type='submit']").click();
    //     });

    //     // // Check for success message
    //     // cy.contains("Password updated successfully.").should("be.visible");
    // });
});
