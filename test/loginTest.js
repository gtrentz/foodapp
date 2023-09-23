import { User } from 'src\loginScreen.js';

class User {
    constructor(name, username, password) {
        this.name = name;
        this.user = username;
        this.pass = password;
        this.liked = [];
        }
}

var u = new User("Grant", "gtrentz", "abc123");
console.log(u.name);