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