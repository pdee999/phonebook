# Phonebook
A simple phone book app.


## Getting Started
This project requires the Grunt CLI

```shell
npm install -g grunt-cli
```

To clone the repo:
```shell
git clone https://github.com/pdee999/phonebook.git
```

To install the project:

```shell
npm install
```

To install bower:

```shell
npm install bower
```

To install dependencies:

```shell
bower install
```

==========================================================================

##Create database table

You will need to create a local site and database and add a SQL table using the following SQL statement:

```shell
CREATE TABLE contacts (
pb_Id AUTO_INCREMENT NOT NULL,
firstname TEXT NOT NULL,
lastname TEXT,
phone TEXT NOT NULL,
PRIMARY KEY(pb_Id),
UNIQUE(pb_Id)
)
```

==========================================================================

##Configuration

Update the server name, database name, username and password settings in the app/config.php file.

```shell
// database information
$servername = "localhost";
$username = "pdrittenhouse";
$password = "password";
$dbname = "phonebook";
```