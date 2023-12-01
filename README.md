# Dokumentasi 🧑🏻‍💻
![Logo](https://github.com/aisucream/TA-VisuFIsio/assets/87255839/d3608bbb-b576-48a2-ae9a-b5e3b6c57ca2)

## User Interfaces

#### UI Login : 
![UI Login](https://github.com/aisucream/TA-VisuFIsio/assets/87255839/0e855f0d-cf92-4523-8799-3947af426eaf)

#### UI Hasil Latihan :
![UI Dashboard](https://github.com/aisucream/TA-VisuFIsio/assets/87255839/8ee9505b-dd1e-4e36-90b5-878e5993fc69)

#### UI Detail Latihan :
![UI Course Detail](https://github.com/aisucream/TA-VisuFIsio/assets/87255839/b1549b96-ac08-4691-b094-7d0a61d7a326)

# API Documentation 💻
## 1. Register 
```http
POST /api/v1/register
```
| Parameter | Type     | Description                                        |
| :-------- | :------- | :-----------------------------------------------   |
| `name`    | `string` | **Required**. Name `example:Jhon Doe`              |
| `email`   | `string` | **Required**. Email `example:jhondhoe@example.com` |
| `password`| `string` | **Required**. Password `example:jhondoe123`        |

### **Body** (JSON Content)
```json
{
    "name":"cahyo",
    "email":"bagus@gmail.com",
    "password":"slang231",
    "type":"mobile"
}
```

### Response
#### 200 OK
```json 
{
    "status": true,
    "message": "User Registered Successfully",
    "data": {
        "name": "cahyo",
        "email": "bagus@gmail.com",
        "updated_at": "2023-11-24T01:11:39.000000Z",
        "created_at": "2023-11-24T01:11:39.000000Z",
        "id": 3
    }
}
```

#### 400 BAD REQUEST
```json
{
    "status": false,
    "message": "Proses Validasi Gagal",
    "data": "The email has already been taken."
}
```

## 2. Login 
```http
POST /api/v1/login
```
| Parameter | Type     | Description                        |
| :-------- | :------- | :--------------------------------  |
| `email`   | `string` | **Required**. Registered Email     |
| `password`| `string` | **Required**. Registered Password  |

### **Body** (JSON Content)
```json
{
    "email": "baguscahyo@gmail.com",
    "password": "bagus123"
}
```
### Response
#### 200 OK
```json
{
    "status": true,
    "message": "Login Succesfully",
    "user": {
        "id": 2,
        "name": "Bagus Cahyo",
        "email": "baguscahyo@gmail.com",
        "email_verified_at": null,
        "type": "mobile",
        "created_at": "2023-11-23T14:05:43.000000Z",
        "updated_at": "2023-11-23T14:05:43.000000Z"
    },
    "token": "6|tsnZt9rG6BJVHa6b2FEc5H7MxBbq5MabfQuYl6Vk336b132e"
}
```

#### 400 BAD REQUEST
```json
{
    "status": false,
    "message": "Email atau Password Tidak Sesuai"
}
```

## 3. Show All Course 
```http
GET /api/v1/courses
```
### Request Header
|Key        | Value                                                       | Description                       |
| :-------- | :---------------------------------------------------------- | :-------------------------------- |
| `Token`   | `Bearer 4Eq0CJc2Wlqx6OAsz65zxn0yvpXbMGxxaTrfBDmZJ8dc72547`  | **Required**. Token from login    |

### Response
#### 200 OK
```json
{
        "succes": true,
        "massage": "Menampilkan Data Course",
        "code": [
            {
                "id": 1,
                "code": "Rebor-001",
                "user_id": 1,
                "start_time": "2023-04-10 00:00:00",
                "end_time": "2023-04-10 00:00:00",
                "created_at": "2023-11-09T19:46:58.000000Z",
                "updated_at": "2023-11-16T18:35:02.000000Z"
            }
        ]
}
```
#### 401 UNAUTHORIZED
```json
{
    "message": "Unauthenticated."
}
```

## 4. Add Course 
```http
POST /api/v1/courses/create
```
| Parameter   | Type         | Description                                       |
| :---------- | :----------- | :------------------------------------------------ |
| `code`      | `string`     | **Required**. Course Code                         |
| `start_time`| `datetime`   | **Nullable**. `example:2023-06-07 10:28:00`       |
| `end_time`  | `datetime`   | **Nullable**. `example:2023-06-07 10:30:00`       |

### Request Header
|Key        | Value                                                       | Description                       |
| :-------- | :---------------------------------------------------------- | :-------------------------------- |
| `Token`   | `Bearer 4Eq0CJc2Wlqx6OAsz65zxn0yvpXbMGxxaTrfBDmZJ8dc72547`  | **Required**. Token from login    |

### **Body** (JSON Content)
```json
{
    "code":"Rebot-010",
    "start_time": "2023/04/06 10:29:00",
    "end_time": "2023/04/06 10:30:00"
}
```

### Response
#### 200 OK
```json
{
        "succes": true,
        "massage": "Data Berhasil Ditambahkan",
        "code": {
            "code": "Rebot-006",
            "user_id": 1,
            "start_time": "2023/04/06 10:29:00",
            "end_time": "2023/04/06 10:30:00",
            "updated_at": "2023-11-16T22:16:37.000000Z",
            "created_at": "2023-11-16T22:16:37.000000Z",
            "id": 10
        }
}
```
#### 400 BAD REQUEST
```json
{
    "status": false,
    "message": "Gagal Memasukan Data",
    "errors": {
        "code": [
            "The code field is required."
        ],
        "start_time": [
            "The start time field must be a valid date."
        ]
    }
}
```

#### 401 UNAUTHORIZED
```json
{
    "message": "Unauthenticated."
}
```

## 5. Edit Course 
```http
  PATCH /api/v1/courses/:c_id/edit
```
| Parameter   | Type           | Description                                       |
| :---------- | :-----------   | :------------------------------------------------ |
| `c_id`      | `interger`     | **Required**. Course's data id                    |
| `code`      | `string`       | **Required**. Course Code                         |
| `start_time`| `datetime`     | **Nullable**. `example:2023-06-07 10:28:00`       |
| `end_time`  | `datetime`     | **Nullable**. `example:2023-06-07 10:30:00`       |

**Example of use :** `PATCH /api/v1/courses/10/edit`

### Request Header
|Key        | Value                                                       | Description                       |
| :-------- | :---------------------------------------------------------- | :-------------------------------- |
| `Token`   | `Bearer 4Eq0CJc2Wlqx6OAsz65zxn0yvpXbMGxxaTrfBDmZJ8dc72547`  | **Required**. Token from login    |

### **Body** (JSON Content)
```json
{
    "code":"Rebot-010",
    "start_time": "2023/04/06 10:31:00",
    "end_time": "2023/04/06 10:39:00"
}
```
### Response
#### 200 OK
```json
{
        "succes": true,
        "massage": "Data Berhasil Diedit",
        "code": {
            "id": 10,
            "code": "Rebot-007",
            "user_id": 1,
            "start_time": "2023/04/06 10:40:20",
            "end_time": "2023/04/06 10:40:00",
            "created_at": "2023-11-16T22:04:29.000000Z",
            "updated_at": "2023-11-16T22:18:11.000000Z"
        }
    
}
```
#### 400 BAD REQUEST
```json
{
    "status": false,
    "message": "Gagal mengedit Data",
    "errors": {
        "code": [
            "The code field is required."
        ],
        "start_time": [
            "The start time field must be a valid date."
        ]
    }
}
```

#### 401 UNAUTHORIZED
```json
{
    "message": "Unauthenticated."
}
```

#### 404 NOT FOUND
```json
{
    "status": false,
    "message": "ID Latihan tidak ditemukan"
}
```

## 6. Show All Course Detail
```http
GET /api/v1/course-details
```
### Request Header
|Key        | Value                                                       | Description                       |
| :-------- | :---------------------------------------------------------- | :-------------------------------- |
| `Token`   | `Bearer 4Eq0CJc2Wlqx6OAsz65zxn0yvpXbMGxxaTrfBDmZJ8dc72547`  | **Required**. Token from login    |

### Response
#### 200 OK
```json
{
    "succes": true,
    "massage": "List Data Course Details",
    "data": [
        {
            "id": 1,
            "course_id": 1,
            "duration": 123,
            "position": 0.04,
            "vout": -0.87,
            "dorsimax": 0.36,
            "plantarmax": -0.010000000000000009,
            "rom": 0.37,
            "percentage": 95,
            "step_amount": 60,
            "step_duration": 0.1,
            "step_per_second": 0.2,
            "created_at": "2023-11-24T01:32:49.000000Z",
            "updated_at": "2023-11-24T01:32:49.000000Z"
        },
        {
            "id": 2,
            "course_id": 1,
            "duration": 120,
            "position": 0.44,
            "vout": -0.87,
            "dorsimax": 0.36,
            "plantarmax": -0.010000000000000009,
            "rom": 0.37,
            "percentage": 95,
            "step_amount": 60,
            "step_duration": 0.1,
            "step_per_second": 0.2,
            "created_at": "2023-11-24T01:32:49.000000Z",
            "updated_at": "2023-11-24T01:32:49.000000Z"
        }
    ]
}
```

#### 401 UNAUTHORIZED
```json
{
    "message": "Unauthenticated."
}
```
## 7. Add Course Detail
```http
POST /api/v1/course-details/create
```
| Parameter         | Type      | Description                                       |
| :---------------- | :-------- | :------------------------------------------------ |
| `course_id`       | `integer` | **Required**. Id of Course                        |
| `duration`        | `decimal` | **Required**. Exercise Duration                   |
| `position`        | `decimal` | **Required**. Ankle Position (P Value)            |
| `vout`            | `decimal` | **Required**. Ankle Angular Velocity (VOUT Value) |
| `dorsimax`        | `decimal` | **Required**. Maximum Dorsiflexion                |
| `plantarmax`      | `decimal` | **Required**. Maximum Plantarflexion              |
| `rom`             | `decimal` | **Required**. Range of Motion                     |
| `percentage`      | `decimal` | **Required**. Correct Gait Sequence Percentage    |
| `step_amount`     | `decimal` | **Required**. Number of Steps                     |
| `step_duration`   | `decimal` | **Required**. Correct Step Duration               |
| `step_per_second` | `decimal` | **Required**. Steps Per Second                    |

### Request Header
|Key        | Value                                                       | Description                       |
| :-------- | :---------------------------------------------------------- | :-------------------------------- |
| `Token`   | `Bearer 4Eq0CJc2Wlqx6OAsz65zxn0yvpXbMGxxaTrfBDmZJ8dc72547`  | **Required**. Token from login    |

### **Body** (JSON Content)
```json
{
  "data": [
        {
            "course_id":5,
            "duration": 120,
            "position": 0.04,
            "vout": -0.87,
            "dorsimax": 0.36,
            "plantarmax": -0.01,
            "rom": 0.37,
            "percentage": 95,
            "step_amount": 60,
            "step_duration": 1.2,
            "step_per_second": 0.83
        },
        {
            "course_id":5,
            "duration": 130,
            "position": 0.24,
            "vout": -0.47,
            "dorsimax": 0.66,
            "plantarmax": -0.31,
            "rom": 0.37,
            "percentage": 65,
            "step_amount": 80,
            "step_duration": 2.2,
            "step_per_second": 5.83
        }
    ]
}
```
### Response
#### 200 OK
```json
{
    "data": {
        "succes": true,
        "massage": "Menampilkan Detail Data",
        "code": [
            {
                "course_id": 5,
                "duration": 120,
                "position": 0.04,
                "vout": -0.87,
                "dorsimax": 0.36,
                "plantarmax": -0.01,
                "rom": 0.37,
                "percentage": 95,
                "step_amount": 60,
                "step_duration": 1.2,
                "step_per_second": 0.83
            },
            {
                "course_id": 5,
                "duration": 130,
                "position": 0.24,
                "vout": -0.47,
                "dorsimax": 0.66,
                "plantarmax": -0.31,
                "rom": 0.37,
                "percentage": 65,
                "step_amount": 80,
                "step_duration": 2.2,
                "step_per_second": 5.83
            }
        ]
    }
}
```
#### 400 BAD REQUEST
```json
{
    "status": false,
    "message": "Gagal menambahkan Data",
    "errors": {
        "step_per_second": [
            "The step per second field must be a number."
        ]
    }
}
```

#### 401 UNAUTHORIZED
```json
{
    "message": "Unauthenticated."
}
```

## 7. Add Course Detail
```http
PATCH /api/v1/course-details/:cd_id/edit
```
| Parameter         | Type      | Description                                             |
| :---------------- | :-------- | :------------------------------------------------------ |
| `cd_id`           | `integer` | **Required**. Course detail's ID                        |
| `course_id`       | `integer` | **Required**. Id of Course                              |
| `duration`        | `decimal` | **Required**. Exercise Duration                         |
| `position`        | `decimal` | **Required**. Ankle Position (P Value)                  |
| `vout`            | `decimal` | **Required**. Ankle Angular Velocity (VOUT Value)       |
| `dorsimax`        | `decimal` | **Required**. Maximum Dorsiflexion                      |
| `plantarmax`      | `decimal` | **Required**. Maximum Plantarflexion                    |
| `rom`             | `decimal` | **Required**. Range of Motion                           |
| `percentage`      | `decimal` | **Required**. Correct Gait Sequence Percentage          |
| `step_amount`     | `decimal` | **Required**. Number of Steps                           |
| `step_duration`   | `decimal` | **Required**. Correct Step Duration                     |
| `step_per_second` | `decimal` | **Required**. Steps Per Second                          |

**Example of use :** `PATCH /api/v1/courses/6/edit`

### Request Header
|Key        | Value                                                       | Description                       |
| :-------- | :---------------------------------------------------------- | :-------------------------------- |
| `Token`   | `Bearer 4Eq0CJc2Wlqx6OAsz65zxn0yvpXbMGxxaTrfBDmZJ8dc72547`  | **Required**. Token from login    |

### **Body** (JSON Content)
```json
{
  "data": [
        {
            "course_id":5,
            "duration": 150,
            "position": 0.04,
            "vout": -0.87,
            "dorsimax": 0.36,
            "plantarmax": 0.3,
            "rom": 0.37,
            "percentage": 96,
            "step_amount": 60,
            "step_duration": 1,
            "step_per_second": 0.83
        }
    ]
}
```
### Response
#### 200 OK
```json
{
    "data": {
        "succes": true,
        "massage": "Data Berhasil Diedit",
        "code": {
            "id": 6,
            "course_id": 5,
            "duration": 150,
            "position": 0.04,
            "vout": -0.87,
            "dorsimax": 0.36,
            "plantarmax": 0.3,
            "rom": 0.37,
            "percentage": 96,
            "step_amount": 60,
            "step_duration": 1,
            "step_per_second": 0.83,
            "created_at": "2023-11-16T22:38:23.000000Z",
            "updated_at": "2023-11-16T23:08:13.000000Z"
        }
    }
}
```
#### 400 BAD REQUEST
```json
{
    "status": false,
    "message": "Gagal mengedit Data",
    "errors": {
        "plantarmax": [
            "The plantarmax field is required."
        ],
        "step_per_second": [
            "The step per second field must be a number."
        ]
    }
}
```

#### 401 UNAUTHORIZED
```json
{
    "message": "Unauthenticated."
}
```

#### 404 NOT FOUND
```json
{
    "status": false,
    "message": "ID Detail Latihan tidak ditemukan"
}
```
# Support Creator 🙌🏻

Arcadius Obaja Naarie 
Code Created at `10/11/2023`

## Social Media
<a href="https://instagram.com/obaja.n"><img src="https://img.shields.io/badge/instagram-E4405F.svg?style=for-the-badge&logo=instagram&logoColor=white"/></a>
<a href="https://twitter.com/SyntaxUndefined"><img src="https://img.shields.io/badge/twitter-1DA1F2.svg?style=for-the-badge&logo=twitter&logoColor=white"/></a>


























