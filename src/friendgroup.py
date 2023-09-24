
from flask import Flask, request, redirect

app = Flask(__name__)

@app.route('/create_group', methods=['POST'])
def create_group():
    # Get form data
    group_name = request.form['group_name']
    members = request.form['members']
    restaurant1 = request.form['restaurant1']
    # Extract other restaurant preferences as needed

    # Create a new group entry in the 'groups' data structure
    new_group = {
        'members': members.split(','),
        'restaurant_preferences': {
            'restaurant1': restaurant1.split(','),
            # Add other restaurant preferences as needed
        },
    }

    # Update the 'groups' data structure with the new group
    groups[group_name] = new_group

    # Serialize and save the updated 'groups' data to a JSON file
    # ...

    # Redirect back to the page or provide feedback
    return redirect('groups.html')

groups = {
    'group1': {
        'members': ['user1', 'user2', 'user3'],
        'restaurant_preferences': {
            'restaurant1': ['dislike', 'like', 'like'],
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

# Function to check if a restaurant is liked by all members of a group
def is_restaurant_liked_by_all(group_name, restaurant_name):
    group = groups.get(group_name)
    if not group:
        return False  # Group not found

    # Get the list of preferences for the given restaurant
    preferences = group['restaurant_preferences'].get(restaurant_name)
    if not preferences:
        return False  # Restaurant not found

    # Check if all members have liked the restaurant
    return all(preference == 'like' for preference in preferences)

# Example usage:
group_name = 'group1'
restaurant_name = 'restaurant1'
if is_restaurant_liked_by_all(group_name, restaurant_name):
    print(f"The restaurant '{restaurant_name}' is liked by all members of '{group_name}'.")
else:
    print(f"The restaurant '{restaurant_name}' is not liked by all members of '{group_name}'.")

if __name__ == '__main__':
    app.run()