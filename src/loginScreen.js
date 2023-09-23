export class User {
    constructor(name, username, password) {
        this.name = name;
        this.user = username;
        this.pass = password;
        this.liked = [];
        }
}

class Restaurant {
    constructor(name, rating, image, type) {
        this.name = name;
        this.rating = rating;
        this.image = image;
        this.cuisine = type;
    }
}

class Group {
    constructor(users, restaurants) {
        this.users = users;
        this.restaurants = restaurants;
    }
}
class Recipes {
    constructor(name, ingredients, intstructions, time, image) {
        this.name = name;
        this.ingredients = ingredients;
        this.time=time;
        this.image=image;
        this.instructions = instructions;
    }
}