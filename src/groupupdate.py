
import json

try:
    with open('C:\\xampp\\htdocs\\groups.txt', 'r') as file:
        groups_data = json.load(file)
except (FileNotFoundError, json.decoder.JSONDecodeError):
    # Handle the case when the file is not found or contains invalid JSON
    # You can initialize an empty JSON object as shown above or take other actions.
    groups_data = {}

# Perform calculations or checks on the group data
# Update relevant data structures as needed

valid_restaurants = {}

# Sample initialization of group data
groups_data = {
    'group1': {
        'members': ['user1', 'user2', 'user3'],
        'restaurant_preferences': {
            'user1': {'restaurant1': 'like', 'restaurant2': 'like'},
            'user2': {'restaurant1': 'like', 'restaurant2': 'dislike'},
            'user3': {'restaurant1': 'like', 'restaurant2': 'like'},
        },
        'restaurants': ['restaurant1', 'restaurant2'],  # List of available restaurants
    },
    # Add other groups as needed
}

# Initialize a dictionary to store valid restaurants for each group
valid_restaurants = {}

# Iterate over each group and calculate valid restaurants
for group_name, group_data in groups_data.items():
    members = group_data['members']
    restaurant_preferences = group_data['restaurant_preferences']

    # Initialize a dictionary to store restaurant likes
    restaurant_likes = {restaurant: 0 for restaurant in group_data['restaurants']}

    # Calculate restaurant likes based on user preferences
    for user in members:
        user_preferences = restaurant_preferences.get(user, {})
        for restaurant, preference in user_preferences.items():
            if preference == 'like':
                restaurant_likes[restaurant] += 1

    # Find the restaurants liked by all users in the group
    valid_restaurants[group_name] = [
        restaurant for restaurant, likes in restaurant_likes.items() if likes == len(members)
    ]

# valid_restaurants now contains a dictionary of valid restaurants for each group
print(valid_restaurants)
