# Shopping Cart Service

## Overview
Need ability to store items user has placed in their cart.

## Goals
- Emit events for all changes in the user shopping cart
- Listen to account delete event from auth service and delete matching shopping cart items as well
- Ability to clear all items in the shopping cart

## Non Goals
- Multiple carts per user
- Ordering of items in the cart
- Saving items for later

## Plan
Create PHP Lumen based API backed by PostgreSQL DB
![High level overview of the microservice architecture diagram](./high-level-microservices.svg)

## Security, Privacy, Risks
This only stores IDs and quantities so the risks are minor.

## DB Schema
CartItems Table

|Field|Type|
|---|---|
|id|BigInt Primary Key Not Null|
|user_id|BigInt Not Null|
|product_id|BigInt Not Null|
|quantity|Int Not Null|
|created_at|Timestamp|
|updated_at|Timestamp|
