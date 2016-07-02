attribute vec3 coordinates;
varying vec4 pos;

void main(void) {

	gl_Position = vec4(coordinates, 1.0);
	pos = gl_Position;
}