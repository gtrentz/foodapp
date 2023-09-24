from flask import Flask, request, render_template

app = Flask(__name__)

# Sample groups data structure (you can replace this with your own)
groups = {
    'group1': {
        'members': ['user1', 'user2', 'user3'],
        'restaurant_preferences': {
            'restaurant1': ['like', 'like', 'like'],
            'restaurant2': ['like', 'dislike', 'like'],
            'restaurant3': ['like', 'like', 'dislike'],
        },
    },
    'group2': {
        'members': ['user4', 'user5'],
        'restaurant_preferences': {
            'restaurant1': ['like', 'like'],
            'restaurant2': ['like', 'dislike'],
        },
    },
}

@app.route('/')
def index():
    return render_template('index.html', groups=groups)

@app.route('/like', methods=['POST'])
def like():
    group_id = request.form['group_id']
    user_id = request.form['user_id']
    restaurant = request.form['restaurant']

    # Update the groups data structure with the user's like
    groups[group_id]['restaurant_preferences'][restaurant][user_id] = 'like'

    return "Liked!"

if __name__ == '__main__':
    app.run(debug=True)