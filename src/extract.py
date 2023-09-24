from flask import Flask, render_template, request
import mysql.connector

app = Flask(__name__)

# MySQL database configuration
db_config = {
    'host': 'Grant-Dell',
    'port': 3306,
    'user': 'root',
    'password': 'Augu$t2003!',
    'database': 'users'
}

@app.route('/signup', methods=['POST'])
def signup():
    # Retrieve form data
    name = request.form['name']
    email = request.form['email']
    username = request.form['username']
    password = request.form['password']

    # Connect to the MySQL database
    conn = mysql.connector.connect(**db_config)
    cursor = conn.cursor()

    # Define the SQL query for inserting data
    insert_query = "INSERT INTO users (name, email, username, password) VALUES (%s, %s, %s, %s)"
    data = (name, email, username, password)

    # Execute the SQL query
    cursor.execute(insert_query, data)

    # Commit the changes to the database
    conn.commit()

    # Close the cursor and connection
    cursor.close()
    conn.close()

    return "Signup successful!"


if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000, debug=True)
