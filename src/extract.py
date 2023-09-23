from flask import Flask, request, render_template
import mysql.connector

app = Flask(__name__)

# Configure MySQL database connection
db = mysql.connector.connect(
    host="your_servername",
    user="your_username",
    password="your_password",
    database="your_database_name"
)

@app.route('/')
def signup_form():
    return render_template('signup.html')

@app.route('/process_form', methods=['POST'])
def process_form():
    name = request.form['name']
    email = request.form['email']
    password = request.form['password']

    cursor = db.cursor()

    # Insert data into MySQL database
    insert_query = "INSERT INTO users (name, email, password) VALUES (%s, %s, %s)"
    values = (name, email, password)

    try:
        cursor.execute(insert_query, values)
        db.commit()
        return "Sign-up successful!"
    except Exception as e:
        db.rollback()
        return f"Error: {e}"

    cursor.close()

if __name__ == '__main__':
    app.run(debug=True)
import mysql.connector

app = Flask(__name__)

# Configure MySQL database connection
db = mysql.connector.connect(
    host="your_servername",
    user="your_username",
    password="your_password",
    database="your_database_name"
)

@app.route('/')
def signup_form():
    return render_template('signup.html')

@app.route('/process_form', methods=['POST'])
def process_form():
    name = request.form['name']
    email = request.form['email']
    password = request.form['password']

    cursor = db.cursor()

    # Insert data into MySQL database
    insert_query = "INSERT INTO users (name, email, password) VALUES (%s, %s, %s)"
    values = (name, email, password)

    try:
        cursor.execute(insert_query, values)
        db.commit()
        return "Sign-up successful!"
    except Exception as e:
        db.rollback()
        return f"Error: {e}"

    cursor.close()

if __name__ == '__main__':
    app.run(debug=True)