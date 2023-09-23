const express = require('express');
const mysql = require('mysql2/promise');

const app = express();

app.use(express.urlencoded({ extended: true }));
app.use(express.json());



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