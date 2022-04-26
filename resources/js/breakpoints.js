'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

exports.Breakpoint = void 0;

let Breakpoint = /** @class */ (function () {
    function Breakpoint(
        breakpoints = { xs: 340, sm: 640, md: 768, lg: 1024, xl: 1280 },
    ) {
        this.breakpoints = breakpoints;
        this.width = window.innerWidth;
        this.currentBreakpoint = this.current;
    }

    Object.defineProperty(Breakpoint.prototype, 'current', {
        get: function () {
            return this.makeCurrent();
        },
        enumerable: false,
        configurable: true,
    });

    Object.defineProperty(Breakpoint.prototype, 'width', {
        get: function () {
            return this.width;
        },
        enumerable: false,
        configurable: true,
    });

    Object.defineProperty(Breakpoint.prototype, 'length', {
        get: function () {
            return Object.keys(this.breakpoints).length;
        },
        enumerable: false,
        configurable: true,
    });

    Object.defineProperty(Breakpoint.prototype, 'keyLast', {
        get: function () {
            return this.keys[this.length - 1];
        },
        enumerable: false,
        configurable: true,
    });

    Object.defineProperty(Breakpoint.prototype, 'keys', {
        get: function () {
            return Object.keys(this.breakpoints);
        },
        enumerable: false,
        configurable: true,
    });

    Object.defineProperty(Breakpoint.prototype, 'values', {
        get: function () {
            return Object.values(this.breakpoints);
        },
        enumerable: false,
        configurable: true,
    });

    Breakpoint.prototype.is = function (breakpoint) {
        let width = this.width;
        return width >= this.value(breakpoint) && width <= this.value(this.index(breakpoint) + 1);
    };

    Breakpoint.prototype.le = function (breakpoint, decrease) {
        if (decrease === void 0) {
            decrease = false;
        }

        let keys = this.keysUntil(breakpoint);

        if (decrease && keys.length > 1) {
            keys.pop();
        }

        return keys.includes(this.current);
    };

    Breakpoint.prototype.ge = function (breakpoint) {
        let index = this.index(breakpoint) - 1;
        return !this.le(this.keys[index >= 0 ? index : 0]);
    };

    Breakpoint.prototype.previous = function (breakpoint) {
        let keys = this.keysUntil(breakpoint);

        let index = this.keys.findIndex(function (subject) {
            return subject === String(keys.pop());
        }) - 1;

        return this.keys[index > 0 ? index : 0];
    };

    Breakpoint.prototype.update = function () {
        if (this.currentBreakpoint === this.makeCurrent(window.innerWidth)) {
            return;
        }

        this.width = window.innerWidth;
        this.currentBreakpoint = this.current;
    };

    Breakpoint.prototype.index = function (breakpoint) {
        let index = this.keys.findIndex(function (key) {
            return key === breakpoint;
        });

        return index >= 0 ? index : 0;
    };

    Breakpoint.prototype.value = function (subject) {
        return typeof subject === 'string'
            ? this.breakpoints[subject]
            : subject >= 0 ? this.values[subject] : 0;
    };

    Breakpoint.prototype.keysUntil = function (breakpoint) {
        let keys = [];

        let match = false;

        this.keys.forEach(function (key) {
            if (match === false) {
                keys.push(key);
                match = key === breakpoint;
            }
        });

        return keys;
    };

    Breakpoint.prototype.makeCurrent = function (width) {
        let _this = this;

        if (width === void 0) {
            width = null;
        }

        if ((width || this.width) >= this.values[this.length - 1]) {
            return this.keyLast;
        }

        let index = this.values.findIndex(function (value) {
            return value > (width || _this.width);
        });

        return this.keys[index - 1 >= 0 ? index - 1 : 0];
    };

    return Breakpoint;
}());

exports.Breakpoint = Breakpoint;
