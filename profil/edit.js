
class test {
    
    constructor(name, lastname, age, email, password, password_confirm) {
        this.test = "test"
        this.name = name
        this.lastname = lastname
        this.age = age
        this.email = email
        this.password = password
        this.password_confirm = password_confirm
        console.log(this);
    }
    
    getTest() {
        return this.test
    }
}

const testClass = new test("test", "test", "test", "test", null, null);
console.log(testClass.getTest());