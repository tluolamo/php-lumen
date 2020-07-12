# Fulfillment Service

## Overview
Need ability to track fulfilment of the order.

## Goals
- Track progress of putting together the package with all customer items in it.
- The service will poll for events from 3rd party API which it will translate to events in our event service.
- It will also store every event it received for no less than 90 days.
- Sends fulfillment requests to the 3rd party warehouse.

## Non Goals
- Support more than one 3rd party warehouse system for the time being.

## Plan
Create serverless AWS Lambda based Go service backed by MySQL DB which accept data in the 3rd party format and translate it to our event format. Listen to order events in the Event service to push fulfillment requests to the warehouse.
![High level overview of the microservice architecture diagram](./high-level-microservices.svg)

## Security, Privacy, Risks
Mostly a backend service, but order data gets pushed through this which includes shipping labels which contains user name and address information.

## DB Schema
Fulfillment Events Table

|Field|Type|
|---|---|
|id|BigInt primary key not null|
|warehouse_id|varchar not null|
|order_id|varchar not null|
|event|text|
|created_at|timestamp|
|updated_at|timestamp|
