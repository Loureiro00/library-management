# Library Management System

This project is a simple library management system built in PHP. It allows users to add, remove, and list books, manage book loans, and register users (students, teachers). The system uses JSON files to persist data and follows Domain-Driven Design principles.

## Project Structure

/library-management
|-- /src | 
|-- /Domain | | 
    |--     /ValueObjects|
    |--        ISBN.php||
|-- Book.php | | 
|-- Person.php | | 
|-- User.php | | 
|-- Student.php | | 
|-- Teacher.php | | 
|-- Loan.php | 
|-- /Infrastructure | | 
|-- BookRepository.php | | |
-- UserRepository.php | | 
|-- LoanRepository.php | 
|-- /Application | | 
|-- LibraryService.php 
|-- /tests | 
|-- BookTest.php | 
|-- LoanTest.php | 
|-- UserTest.php | 
|-- TeacherTest.php | 
|-- StudentTest.php | 
|-- BookRepositoryTest.php | 
|-- LoanRepositoryTest.php | 
|-- UserRepositoryTest.php 
|-- /storage | 
|-- books.json | 
|-- users.json | 
|-- loans.json 
|-- composer.json 
|-- README.md 
|-- .gitignore

## Installation

1. Clone the Repository
git clone https://github.com/Loureiro00/library-management.git
cd library-management

2. Install Dependencies
Use Composer to install the necessary dependencies (like PHPUnit for testing).
composer install

3. Setup the Project
Ensure that the /storage directory contains the following empty JSON files to store data:
touch storage/books.json
touch storage/users.json
touch storage/loans.json

Populate these files with empty arrays for initial setup:
[]

## How to Use

1. Book Management
To add a book, you will use the LibraryService class and call the addBook() method:

$libraryService = new LibraryService(new BookRepository(), new UserRepository(), new LoanRepository());

$book = new Book('PHP for Beginners', 'John Doe', '1234567890');
$libraryService->addBook($book);

To remove a book:

$libraryService->removeBook('1234567890');


2. User Management
Register a user as a student:
$student = new Student('Jane Doe', 'USR123', 'ENR456');
$libraryService->registerUser($student);

Or as a teacher:
$teacher = new Teacher('John Smith', 'USR456', 'Mathematics');
$libraryService->registerUser($teacher);

3. Loan Management
Lend a book to a user:
$libraryService->lendBook($book, $student);

Return a book:
$loan = $libraryService->getLoan('1234567890');  // Assuming this method exists
$libraryService->returnBook($loan);


Running Tests
The project includes a suite of unit tests using PHPUnit. To run the tests:
vendor/bin/phpunit --testdox tests 

This will run all the test files located in the /tests directory, ensuring the correctness of your system.

File Storage
Data is persisted using JSON files located in the /storage directory:

books.json stores all the books.
users.json stores all the users (both students and teachers).
loans.json stores all the loans.
Contributing
Feel free to fork this repository, open issues, and submit pull requests. Any contributions to improve the project are welcome.

License
This project is licensed under the MIT License - see the LICENSE file for details.