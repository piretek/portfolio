/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

let settings = { delay: 300, interval: 300, distance: '20px' };

let left = [
    '.timeline__element--image:nth-child(1)',
    '.timeline__element--info:nth-child(1)',
];

let right = [
    '.timeline__element--image:nth-child(4)',
    '.timeline__element--info:nth-child(4)',
    '.timeline__element--image:nth-child(3)',
    '.timeline__element--info:nth-child(3)',
];

ScrollReveal().reveal(left.join(', '), { ...settings, origin: 'left' });
ScrollReveal().reveal(right.join(', '), { ...settings, origin: 'right' });


