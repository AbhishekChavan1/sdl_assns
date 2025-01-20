@echo off

REM Create the root project folder
mkdir EmployeeRegistration

REM Create subdirectories
mkdir EmployeeRegistration\css
mkdir EmployeeRegistration\img

REM Create necessary files
echo. > EmployeeRegistration\index.php
echo. > EmployeeRegistration\employee_form.php
echo. > EmployeeRegistration\employee_list.php
echo. > EmployeeRegistration\config.php
echo. > EmployeeRegistration\css\styles.css
echo. > EmployeeRegistration\img\background.jpg

echo Directory structure created successfully!
pause
