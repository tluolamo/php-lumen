# Event Service

## Overview
Need ability to store events for 24 hours.

## Goals
- Support more than one listener acting on a single event
- Events are stored for 24 hours after which they can expire
- All events are in JSON format

## Non Goals
- Permanent storage of every event to perpetuity
- Other formats then JSON

## Plan
Utilize AWS Kinesis for the event queue.
![High level overview of the microservice architecture diagram](./high-level-microservices.svg)

## Security, Privacy, Risks
This service can store sensitive data such as email addresses, mailing addresses, credit card/order transaction detail although not the card numbers etc themselves.
