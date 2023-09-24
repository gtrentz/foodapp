import json

# Your 'groups' dictionary with data
groups = {
    # ... (your group data here)
}

# Serialize the 'groups' data to a JSON file
with open('groups.json', 'w') as json_file:
    json.dump(groups, json_file)