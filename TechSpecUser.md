# User Profile Service

## Overview
Need ability for user to authenticate so they can purchase items from our site. Need ability to store user details like mailing address and name.

## Goals
- Support emitting events
- Support listening to events
- Need to be able to store multiple shipping addresses.
- Support user creating an account with email and password only
- Support changing email or password
- Support deleting the account
- Use events to notify other services of any change to user data.

## Non Goals
- Multiple phone numbers
- Any sort of multi account sharing of information.

## Plan
Create PHP Lumen based API backed by PostgreSQL DB and AWS S3 for image file storage.
![High level overview of the microservice architecture diagram](./high-level-microservices.svg)

## Security, Privacy, Risks
This service can store sensitive data such as mailing addresses and phone numbers as well as names.


## DB Schema
Users Table

|Field|Type|
|---|---|
|id|BigInt Primary Key Not Null|
|email|varchar Unique Not Null|
|password|varchar Not Null|
|name|Varchar Not Null|
|status|enum(active, inactive)|
|created_at|Timestamp|
|updated_at|Timestamp|

Addresess Table

|Field|Type|
|---|---|
|id|BigInt Primary Key Not Null|
|user_id|BigInt Unique Not Null|
|name|Varchar Not Null|
|address1|Varchar|
|address2|Varchar|
|city|Varchar|
|state|Varchar|
|postal_code|Varchar|
|country|Varchar|
|primary|Bool|
|created_at|Timestamp|
|updated_at|Timestamp|
