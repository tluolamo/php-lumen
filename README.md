# README

## Roadmap and Releases

Project will be setup to do releases after each sprint with completed services and features.

|Sprint/Release|Features/Services|
|---|---|
|Pre-launch release #1  |User Profile service             <br>Eventing service|
|Pre-launch release #2  |Communications Service           <br>UI for User Profile Service|
|Pre-launch release #3  |Product Service                  <br>Shopping Cart Service|
|Pre-launch release #4  |Shipping Service                 <br>UI for Product Service|
|Pre-launch release #5  |UI for Shipping Service          <br>UI for Shopping Cart Service|
|Pre-launch release #6  |Order Service                    <br>UI for Payment Service|
|Pre-launch release #7  |Address Standardization Service  <br>UI for Order Service|
|Initial Launch Release |Fulfillment service              <br>UI for Address Standardization Service|

## KPIs
|KPI|Formula|
|---|---|
|Conversion Rate|(No. of Conversions / No. of Leads) * 100|
|Shopping cart abandonment rate|(1 - (No. of Completed Transactions / No. of Shopping Carts Created)) * 100|
|Cost of customer acquisition|Amount of Money Spent to Acquire Customers / No. of Customers Acquired|
|Customer lifetime value|Average order value * Average number of times a customer buys per year * Average customer retention time in months or years|
|Average order value|Total Revenue / Total No. of Orders|
|Total Profit|Revenue - Cost|
|Gross profit margin|Profit / Revenue * 100|

## High Level Overview of the Microservice Architecture
This system uses event service for all communications between the services. All services emit events as they occur and all services listen to the events that they care about and act on those.

![High level overview of the microservice architecture diagram](./high-level-microservices.svg)

## Service Tech Specifications

- [User Profile Service](TechSpecUser.md)
- [Event Service](TechSpecEvent.md)
- [Product Service](TechSpecProduct.md)
- [Shopping Cart Service](TechSpecShoppingCart.md)
- [Shipping Service](TechSpecShipping.md)
- [Payment Service](TechSpecPayment.md)
- [Communication Service](TechSpecCommunication.md)
- [UI Service](TechSpecUI.md)
- [Fulfillment Service](TechSpecFulfillment.md)
- [Address Standardization Service](TechSpecAddress.md)
- [Order Service](TechSpecOrder.md)


## Basic API Usage

### Register
```bash
curl --location --request POST 'localhost:8000/api/register' \
--header 'Content-Type: application/json' \
--data-raw '{
    "email": "jdoe@nowehre.com",
    "password": "secret",
    "password_confirmation": "secret"
}'
```
### Login
```bash
curl --location --request POST 'localhost:8000/login' \
--header 'Content-Type: application/json' \
--data-raw '{
    "email": "jdoe@nowehre.com",
    "password": "secret"
}'
```
### Get User
```bash
curl --location --request GET 'localhost:8000/user' \
--header 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU5NDM5NDU2MiwiZXhwIjoxNTk0Mzk4MTYyLCJuYmYiOjE1OTQzOTQ1NjIsImp0aSI6IlpveGVMUkQyNFVlWVEzVzkiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.ZD1MpDOvraVFjfWvfjWNqP482LOEKgB1W-qaBdz2IwA'
```
### Update User
```bash
curl --location --request PUT 'localhost:8000/user' \
--header 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU5NDM5NDU2MiwiZXhwIjoxNTk0Mzk4MTYyLCJuYmYiOjE1OTQzOTQ1NjIsImp0aSI6IlpveGVMUkQyNFVlWVEzVzkiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.ZD1MpDOvraVFjfWvfjWNqP482LOEKgB1W-qaBdz2IwA' \
--header 'Content-Type: application/json' \
--data-raw '{
    "email": "jdoe@somewhere.com",
    "password": "new secret",
    "password_confirmation": "new secret"
}'
```
### Delete User
```bash
curl --location --request DELETE 'localhost:8000/user' \
--header 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU5NDM5NTAyNSwiZXhwIjoxNTk0Mzk4NjI1LCJuYmYiOjE1OTQzOTUwMjUsImp0aSI6Ik50ZFdhcFkxWjBHb1dJdTQiLCJzdWIiOjIsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.wsDJpudmnrDO5Zc6ms7QKSCVWWDfCtdQNCk3J-FUkF4'
```
