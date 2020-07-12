# Payment Service

## Overview
Need ability for users to pay with their credit card.

## Goals
- Instant payments processing via credit card and possibly some other common payment mentohods.


## Non Goals
- Use more than one 3rd party payment gateway

## Plan
Utilize [Stripe API](https://stripe.com/docs/api) directly
![High level overview of the microservice architecture diagram](./high-level-microservices.svg)

## Security, Privacy, Risks
This will be a 3rd party service which stores credit card information. Need to make sure they are sufficiently secure, beyond that we don't have direct risks associated with this.
