# Product Service

## Overview
Need ability to store and search store inventory items.

## Goals
- Support emitting events
- Support listening to events
- Need a universal search so users can search by any field.
- Support multiple high quality images and videos of the products.
- Have description and price information.

## Non Goals
- Related or sequenced products

## Plan
Create PHP Lumen based API backed by MySQL DB and AWS S3 for image and video file storage.
![High level overview of the microservice architecture diagram](./high-level-microservices.svg)

## Security, Privacy, Risks
This is mostly publicly available information so the risks are minor.

## DB Schema
Product Table

|Field|Type|
|---|---|
|id|BigInt Primary Key Not Null|
|name|varchar Not Null|
|description|text|
|price|float|
|weight|float|
|dimensions_x|float|
|dimensions_y|float|
|dimensions_z|float|
|status|Enum(Sold Out, Available, Back Order, Disabled)|
|created_at|timestamp|
|updated_at|timestamp|

ProductMediaFile Table
|Field|Type|
|---|---|
|id|BigInt Primary Key Not Null|
|product_id|BigInt|
|alt_text|Varchar|
|url|Varchar|
|type|enum(Image, Video)|
|order|Int|
|created_at|timestamp|
|updated_at|timestamp|
