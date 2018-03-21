DELIMITER //
# in: 服务名称,存储查询结果集的临时表名称
# out: 生成一个临时表，存储相关服务人员信息
# ,IN resultList VARCHAR(50)
drop PROCEDURE  IF EXISTS getServer;
create PROCEDURE getServer(IN service_name varchar(32))
  BEGIN
    drop TEMPORARY table IF EXISTS serverList;
    create TEMPORARY TABLE serverList
    select name,level,avgscore
      from works RIGHT JOIN assistInfo ON works.AID=assistInfo.AID
      where SID=(select SID from service where service.name=service_name);
  END //

drop PROCEDURE  IF EXISTS viewOrder;
create PROCEDURE viewOrder(IN user_name varchar(32))
  BEGIN
    drop TEMPORARY table IF EXISTS orderList;
    create TEMPORARY TABLE orderList
        select OID AS orderId,orderTime,userName,serverName,serviceName,appointmentTime from orders where userName=user_name;
  END //

DELIMITER ;

# call getServer('service1','service1List');
