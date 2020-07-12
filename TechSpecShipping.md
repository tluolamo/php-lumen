# Shipping Service

## Overview
Need ability to calculate shipping charges to user mailing address.

## Goals
- Provides shipping options and prices of the item to user location.
- Provide estimated shipping charges publicly and firm ones privately.
- Use third party shipping provider APIs to calculate shipping price

## Non Goals
- Multiple shipping locations in a single request.

## Plan
Create PHP Lumen based API which works as intermediary to 3rd party APIs.
![High level overview of the microservice architecture diagram](./high-level-microservices.svg)

## Security, Privacy, Risks
Address data is passed through this service, need to make sure it is kept private. No need for data storage.
