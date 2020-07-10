# README

## Basic API Usage

### Register:
```bash
curl --location --request POST 'localhost:8000/api/register' \
--header 'Content-Type: application/json' \
--data-raw '{
    "email": "jdoe@nowehre.com",
    "password": "secret",
    "password_confirmation": "secret"
}'
```
### Login:
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
