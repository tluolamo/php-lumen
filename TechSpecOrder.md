# User Interface

## Overview
Service which tracks a completed user transaction or order from the point user clicked purchase until has has been shipped to the customer.

## Goals
- Permanently store order history
- Order record needs all item details (ie name, details field, weight, dimensions, etc.) copied to it so it has everything as it was at the time of purchase even if the underlying data changes over time.
- Be able to list orders sorted by most recent first

## Non Goals
- Item pictures and videos do not need to be copied or any other large media files related to the order
- Any other sorts or filtering outside of most recent.

## Plan
Use Lumen API backed with PostgreSQL where we store the order object with all the details of each item purchased, shipping address, total charges, Charge object id from Stripe and current status.
This service needs to talk directly to the shipping API to get the exact shipping charges as well as the product service to get the product prices and finally tot he payment service to charge the user for the total price calculated.
![High level overview of the microservice architecture diagram](./high-level-microservices.svg)

## Security, Privacy, Risks
This stores user name and address data as well as detailed order history.


## DB Schema
Order Table

|Field|Type|
|---|---|
|id|BigInt Primary Key Not Null|
|product_id|varchar Not Null|
|purchase_time|timestamp|
|fulfilled_time|timestamp|
|ship_time|timestamp|
|status|enum(placed, fulfilled, shipped)|
|shipping_cost|double|
|item_cost|double|
|tax|double|
|discount|double|
|total|double|
|created_at|timestamp|
|updated_at|timestamp|
