# Communications Service

## Overview
Need ability to communicate with the user via email messaging.

## Goals
- Support sending emails to users based on multiple event listeners.
- At the minimum we need welcome, Fulfillment completed, order shipped and password/email address updated emails.

## Non Goals
- Support other communications methods beyond email for the time being.

## Plan
Create AWS Lambda in Go which listens to the event queue and uses AWS SES to send out the emails.
![High level overview of the microservice architecture diagram](./high-level-microservices.svg)

## Security, Privacy, Risks
This services passes through emails addresses but has no storage in itself.
