**PROJECT : WEBPAGE WITH FREQUENTLY ASKED QUESTIONS**

Description - Building a web page where one can raise and address common concerns, questions, and objections on an open forum. Multiple answers for one question can be judged to pick the best answer by majority of the users. More details of the project can be found in the user stories section.

**To run the FAQ project:**


1.    git clone https://github.com/hg256/FAQ.git

2.    CD into FAQ and run composer install

3.    setup database with sqlite

4.    Run: php artisan migrate

5.    Run: unit tests: phpunit

**Epic and User Stories**


_**Epic:**_ Implement a feature to the application, which allows the user who posted a question to mark one of the answers as the best answer.

 

_**User Stories:**_

1.    As a registered User, I want to be be able to post new questions on the open forum, so that I can capture the responses for the question, given I am in the home page, where all the questions are accessible to every user.

2.    As a logged in User, I want to be able to see the name of the User who posted the question and names of the users who posted the answers.

3.    As a User who posted a question, I want to be able to see all the answers posted by other users.

4.    As a User, I want to be able to choose one of the answers as the “best answer” for the question I posted.

5.    As a User, I want to be able to make sure only the user who posted the question can choose the best answer and not other users.

6.    As a User, I want to be able to share my question on Facebook, Twitter and Google Plus.

7.    As a User, I want to see the UI updated to Material Design. 

Link to Heroku: https://faqbestanswerproject.herokuapp.com/
