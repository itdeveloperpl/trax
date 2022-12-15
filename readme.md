# Laravel Backend Coding Simulation

## Trax Milage Tracking Application


#### What has been done ####
* Designed data model and migrations for Car, Trip. Additionally created user Roles and Groups to provide role based access policies.
* Created Car, Trip seeder to provide some fake data.
* Implemented models
* Implemented controllers and api endpoints. Trip listing endpoint uses raw queries or query builder.
* Implemented validation via Request classes.
* Implemented Policies, Resources, Observers.
* Created tests for Cars and Trips endpoints
* Return api validation error messages to trip creation form.

I have created sqlite database with some fake data for testing purposes. You can test application without making any
migrations or seeding. Just log in with credentials:

L:test@test.pl

P:testtest

Api token: z68GmPmAK2RACaYBAQxfnKJxA9sJhlF6Z4sff8f9


#### What I haven't done ####

**Passing access token to frontend**

In order to provide authentication and role based authorization I had to add auth:api and policy middleware to each api routes.
Due to insufficient time I wasn't able to pass token to vue views in order to authenticate requests made from vue. For now
frontend can't provide right access token for each api request so frontend application will get 401 status.
To test on frontend please comment out middlewares for each route in api.php route file.
For now every endpoint is testable via Postman with access token listed above.
