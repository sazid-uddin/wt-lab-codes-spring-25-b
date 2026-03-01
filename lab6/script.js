// Primitive data types in JavaScript
var a = "Hello, World!";
console.log(a.length);
var str = "AIUB's Specialty"
var str = 'He say\'s "hello"'; // espace character
var b = 42.5;
var c = false;
var d = undefined;
var e; // undefined
var f = null;;
let g = 100;

function func() {
	var h = "Inside function";
	let i = "Inside function with let";
	if (true) {
		let h = "Inside block";
		console.log(h);
	}
}

console.log(a);
console.log(isNaN(a)); // Check if a is Not a Number
a = 12;
console.log(isNaN(a)); // Check if a is Not a Number
console.log(a);
console.log(b);
console.log(c);
console.log(d);
console.log(e);
console.log(f);

console.log(typeof(a));
console.log(typeof b);
console.log(typeof c);
console.log(typeof d);
console.log(typeof e);
console.log(typeof f);

var bigNum = .123456789012345;