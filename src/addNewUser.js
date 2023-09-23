const express = require('express');
const mysql = require('mysql2/promise');

const app = express();

app.use(express.urlencoded({ extended: true }));
app.use(express.json());

function addNewUser() {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
  
    // Send form data to server using HTTP POST request
    // ...
  }

app.post('/signup', async (req, res) => {
  const { name, email, password } = req.body;

  // Validate user input
  // ...

  // Insert user data into database
  const connection = await mysql.createConnection({
    host: 'localhost',
    user: 'myuser',
    password: 'mypassword',
    database: 'mydatabase'
  });

  const [rows, fields] = await connection.execute(
    'INSERT INTO users (name, email, password) VALUES (?, ?, ?)',
    [name, email, password]
  );

  connection.end();

  res.send('User created successfully');
});

app.listen(3000, () => {
  console.log('Server started on port 3000');
});