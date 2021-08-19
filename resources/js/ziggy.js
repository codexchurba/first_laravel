const Ziggy = {"url":"http:\/\/first_laravel.test","port":null,"defaults":{},"routes":{"index":{"uri":"\/","methods":["GET","HEAD"]},"activities.index":{"uri":"activities","methods":["GET","HEAD"]},"activities.create":{"uri":"activities\/create","methods":["GET","HEAD"]},"activities.store":{"uri":"activities","methods":["POST"]},"activities.show":{"uri":"activities\/{activity}","methods":["GET","HEAD"]},"activities.edit":{"uri":"activities\/{activity}\/edit","methods":["GET","HEAD"]},"activities.update":{"uri":"activities\/{activity}","methods":["PUT","PATCH"],"bindings":{"activity":"id"}},"activities.destroy":{"uri":"activities\/{activity}","methods":["DELETE"],"bindings":{"activity":"id"}},"login":{"uri":"login","methods":["GET","HEAD"]},"logout":{"uri":"logout","methods":["POST"]},"register":{"uri":"register","methods":["GET","HEAD"]},"password.request":{"uri":"password\/reset","methods":["GET","HEAD"]},"password.email":{"uri":"password\/email","methods":["POST"]},"password.reset":{"uri":"password\/reset\/{token}","methods":["GET","HEAD"]},"password.update":{"uri":"password\/reset","methods":["POST"]},"password.confirm":{"uri":"password\/confirm","methods":["GET","HEAD"]},"home":{"uri":"home","methods":["GET","HEAD"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
