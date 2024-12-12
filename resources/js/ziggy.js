const Ziggy = {"url":"http:\/\/localhost","port":null,"defaults":{},"routes":{"sanctum.csrf-cookie":{"uri":"sanctum\/csrf-cookie","methods":["GET","HEAD"]},"admin.index":{"uri":"admin","methods":["GET","HEAD"]},"admin.operarios.index":{"uri":"admin\/operarios","methods":["GET","HEAD"]},"admin.operarios.create":{"uri":"admin\/operarios\/create","methods":["GET","HEAD"]},"admin.operarios.edit":{"uri":"admin\/operarios\/{id}\/edit","methods":["GET","HEAD"],"parameters":["id"]},"admin.operarios.store":{"uri":"admin\/operarios","methods":["POST"]},"admin.operarios.update":{"uri":"admin\/operarios\/{id}","methods":["PUT"],"parameters":["id"]},"admin.clientes.index":{"uri":"admin\/clientes","methods":["GET","HEAD"]},"admin.clientes.create":{"uri":"admin\/clientes\/create","methods":["GET","HEAD"]},"admin.clientes.edit":{"uri":"admin\/clientes\/{id}\/edit","methods":["GET","HEAD"],"parameters":["id"]},"admin.clientes.store":{"uri":"admin\/clientes","methods":["POST"]},"admin.clientes.update":{"uri":"admin\/clientes\/{id}","methods":["PUT"],"parameters":["id"]},"pedidos":{"uri":"pedidos","methods":["GET","HEAD"]},"clientes":{"uri":"clientes","methods":["GET","HEAD"]},"dashboard":{"uri":"dashboard","methods":["GET","HEAD"]},"profile.edit":{"uri":"profile","methods":["GET","HEAD"]},"profile.update":{"uri":"profile","methods":["PATCH"]},"profile.destroy":{"uri":"profile","methods":["DELETE"]},"register":{"uri":"register","methods":["GET","HEAD"]},"login":{"uri":"login","methods":["GET","HEAD"]},"password.request":{"uri":"forgot-password","methods":["GET","HEAD"]},"password.email":{"uri":"forgot-password","methods":["POST"]},"password.reset":{"uri":"reset-password\/{token}","methods":["GET","HEAD"],"parameters":["token"]},"password.store":{"uri":"reset-password","methods":["POST"]},"verification.notice":{"uri":"verify-email","methods":["GET","HEAD"]},"verification.verify":{"uri":"verify-email\/{id}\/{hash}","methods":["GET","HEAD"],"parameters":["id","hash"]},"verification.send":{"uri":"email\/verification-notification","methods":["POST"]},"password.confirm":{"uri":"confirm-password","methods":["GET","HEAD"]},"password.update":{"uri":"password","methods":["PUT"]},"logout":{"uri":"logout","methods":["POST"]},"storage.local":{"uri":"storage\/{path}","methods":["GET","HEAD"],"wheres":{"path":".*"},"parameters":["path"]}}};
if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
  Object.assign(Ziggy.routes, window.Ziggy.routes);
}
export { Ziggy };
