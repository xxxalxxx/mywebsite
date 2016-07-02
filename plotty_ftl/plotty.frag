precision highp float;

uniform vec2 offset;
uniform float aspect;
uniform float scale;
uniform float dx;

varying vec4 pos;

void main(void) { 
	float x = pos.x - offset.x;
	float y = scale*aspect*(1.0/x) + offset.y;
	float y2 = scale*aspect*( 1.0/(x + dx) ) + offset.y;

	vec3 col = vec3(0.0, 0.0, 1.0);
	float dy = abs(y-y2);
	float slope = dy/dx;
	float eps = 0.005;
	if(slope > 1.0) eps *= slope;

	if(abs(pos.y - y) < eps ) 
		col = vec3(1.0, 0.0, 0.0);
	if( abs(dy) > 2.0)
		col = vec3(0.0, 0.0, 1.0);

    gl_FragColor = vec4(col, 1.0);
}