CREATE OR REPLACE FUNCTION update_preco_total() RETURNS TRIGGER AS
$update_preco_trigger$
BEGIN
  UPDATE pizzaria.pedido SET preco_total = (
    SELECT sum(bb.preco)
    FROM (pizzaria.pedido_tem_bebidas pb JOIN pizzaria.bebidas b ON pb.bebida_id = b.id) bb
    WHERE bb.pedido_id = pedido.id
  ) WHERE id = NEW.pedido_id;
  RETURN NEW;
END;
$update_preco_trigger$ LANGUAGE plpgsql;

CREATE TRIGGER trigger_preco_update AFTER INSERT ON pizzaria.pedido_tem_bebidas FOR EACH ROW EXECUTE PROCEDURE update_preco_total();