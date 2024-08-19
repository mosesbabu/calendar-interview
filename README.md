
# 📅 Calendar CRUD Operations

Welcome to the Calendar CRUD Operations task! This task is designed to assess your ability to understand existing code and modify it to include CRUD (Create, Read, Update, Delete) operations with a database. You will be working on the backend implementation and ensuring seamless integration with the calendar frontend.

## 📝 Task Overview

Your objective is to:
- Create a fork of the codebase
- Understand the given codebase.
- Modify the relevant files to add CRUD operations for handling calendar events.
- Ensure proper database connection and interaction.
- Implement the backend file structure and APIs.
- Ensure the calendar frontend interacts smoothly with the backend.

## 🔍 Assessment Criteria

Your task will be assessed based on:
1. **Database Connection**: Efficient and secure connection to the database.
2. **Backend Implementation**: Clean and organized file structure.
3. **API Development**: Robust and well-documented APIs for CRUD operations.
4. **Frontend Integration**: Smooth and functional integration of the calendar with the backend.

## 📂 Project Structure

```
calendar-crud-operations/
├── assets/
│   ├── css/
│   ├── img/
│   ├── js/
│   ├── json/
│   ├── vendor/
├── includes/
│   ├── scripts.php
│   ├── search_bar.php
│   ├── sidebar.php
├── .gitignore
├── header.php
├── footer.php
├── index.php
├── README.md

```
# 📖 API Documentation

## Create Event
- **URL**: `http://localhost/server/event.php`
- **Method**: `POST`
- **Description**: Creates a new event in the database.
- **Request Body**:
  - `eventTitle` (string, required): The title of the event.
  - `eventLabel` (string, required): The label/category of the event.
  - `eventStartDate` (string, required): The start date and time of the event.
  - `eventEndDate` (string, required): The end date and time of the event.
  - `allDaySwitch` (string, optional): Indicates if the event is an all-day event (`on` or `off`).
  - `eventURL` (string, optional): URL related to the event.
  - `eventLocation` (string, optional): Location of the event.
  - `eventGuests` (array of strings, optional): List of guests.
  - `eventDescription` (string, optional): Description of the event.
- **Success Response**:
  - **Code**: `200 OK`
  - **Content**:
    ```json
    {
      "success": true,
      "message": "Event created successfully."
    }
    ```
- **Error Response**:
  - **Code**: `400 Bad Request`
  - **Content**:
    ```json
    {
      "success": false,
      "message": "Failed to create event."
    }
    ```

## Update Event
- **URL**: `http://localhost/server/event.php`
- **Method**: `PUT`
- **Description**: Updates an existing event in the database.
- **Request Body**:
  - `id` (integer, required): The unique identifier of the event to be updated.
  - `eventTitle` (string, optional): The new title of the event.
  - `eventLabel` (string, optional): The new label/category of the event.
  - `eventStartDate` (string, optional): The new start date and time of the event.
  - `eventEndDate` (string, optional): The new end date and time of the event.
  - `allDaySwitch` (string, optional): Indicates if the event is an all-day event (`on` or `off`).
  - `eventURL` (string, optional): New URL related to the event.
  - `eventLocation` (string, optional): New location of the event.
  - `eventGuests` (array of strings, optional): New list of guests.
  - `eventDescription` (string, optional): New description of the event.
- **Success Response**:
  - **Code**: `200 OK`
  - **Content**:
    ```json
    {
      "success": true,
      "message": "Event updated successfully."
    }
    ```
- **Error Response**:
  - **Code**: `400 Bad Request`
  - **Content**:
    ```json
    {
      "success": false,
      "message": "Failed to update event."
    }
    ```

## Delete Event
- **URL**: `http://localhost/server/event.php`
- **Method**: `DELETE`
- **Description**: Deletes an existing event from the database.
- **Request Body**:
  - `id` (integer, required): The unique identifier of the event to be deleted.
- **Success Response**:
  - **Code**: `200 OK`
  - **Content**:
    ```json
    {
      "success": true,
      "message": "Event deleted successfully."
    }
    ```
- **Error Response**:
  - **Code**: `400 Bad Request`
  - **Content**:
    ```json
    {
      "success": false,
      "message": "Failed to delete event."
    }
    ```


## 💡 Tips for Success

- Ensure your database connection is secure and handles errors gracefully.
- Keep your code modular and organized for scalability.
- Write clear and concise API documentation.
- Test your API endpoints thoroughly.

## 📬 Contact

For any questions or clarifications, feel free to reach out via [fiona@vesencomputing.com](mailto:fiona@vesencomputing.com).
