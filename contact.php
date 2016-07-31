<div class="contact">
    <div class="message" ng-class="{error: !success, success: success}" ng-show="response">{{ response }}</div>

    <form method="post" name="contactForm" ng-show="!success" ng-submit="processForm()">
        <label for="name">
            Name
            <span class="error" ng-show="contactForm.name.$dirty && contactForm.name.$error.required">Required</span>
        </label>
        <input type="text" name="name" id="name" ng-model="formData.name" required>

        <label for="email">
            Email
            <span class="error" ng-show="contactForm.email.$dirty && contactForm.email.$error.required">Required</span>
            <span class="error" ng-if="contactForm.email.$viewValue.length>0 && contactForm.email.$invalid">Invalid Email</span>
        </label>
        <input type="email" name="email" id="email" ng-model="formData.email" required>


        <label for="message">
            Message
            <span class="error" ng-show="contactForm.message.$dirty && contactForm.message.$error.required">Required</span>
        </label>
        <textarea name="message" id="message" ng-model="formData.message" required></textarea>

        <input type="text" name="url" class="hidden" ng-model="formData.url" />

        <button type="submit" class="wide-button" ng-disabled="contactForm.$invalid">Send</button>
    </form>
</div>
