use service_center;
DELIMITER //

DROP FUNCTION IF EXISTS addUserAccounts;

create function addUserAccounts(username VARCHAR(20),pwd VARCHAR(32))
  returns varchar(20)
  begin
    insert into accounts values(username,pwd);
    return 'add user account success';
  end//
DROP FUNCTION IF EXISTS addUserInfo;
create function addUserInfo(uid INTEGER,realName varchar(32),photo varchar(100),gender varchar(6),age integer(3) unsigned,
                            phone varchar(32),nation varchar(11),email varchar(50))
  returns varchar(20)
  BEGIN
    insert into userInfo values(uid,realName,photo,gender,age,phone,nation,email);
    return 'add userInfo success';
  END //
# 更新登录密码
DROP FUNCTION IF EXISTS updatePassword;
create function updatePassword(u_name VARCHAR(20),new_pwd VARCHAR(32))
  returns varchar(20)
  begin
    update accounts set password=new_pwd where username=u_name;
    return 'update success';
  END//
# 更新登录记录
DROP FUNCTION IF EXISTS updateLogin;
create function updateLogin(u_name VARCHAR(20))
  returns varchar(20)
  begin
    update accounts set loginTimes=loginTimes+1,lastLogin=CURRENT_TIMESTAMP where username=u_name;
    return 'login success';
  END//
# 重置用户密码及登录次数
DROP FUNCTION IF EXISTS resetAccounts;
create function resetAccounts(id INTEGER ,pwd VARCHAR(32))
  returns varchar(20)
  begin
    update accounts set password=pwd,logintimes='0' where AID=id;
    return 'reset Account success';
  end//
#删除用户
DROP FUNCTION IF EXISTS deleteUser;
create function deleteUser(u_name varchar(20))
  returns varchar(20)
  begin
    drop user u_name;
    delete  from accounts where username=u_name;# 因设置了cascade，会级联删除其他相关数据
    return 'deleted user success';
  end//


# 给定一个基准，依此上下来分别计算工资，比如1W
DROP FUNCTION IF EXISTS updateSalary;
create  function updateSalary(standard varchar(10),method varchar(10),base decimal(8,2),more_value decimal(8,2),less_value decimal(8,2))
  returns varchar(20)
  begin
    IF method="rate" THEN
      IF standard="standard" THEN
        update salary set salary = case
                                  when salary >= base then salary*more_value
                                  else salary*less_value
                                  end;
      elseif standard="average" THEN
        update salary set salary= case
                                  when salary >= avg_salary.avg_salary then more_value*salary
                                  else salary*less_value
                                  end;
      END IF;
    ELSEIF method="value" THEN
      IF standard="standard" THEN
        update salary set salary= case
                                  when salary >= base then salary+more_value
                                  else salary+less_value
                                  end;

      elseif standard="average" THEN
        update salary set salary= case
                                  when salary >= avg_salary.avg_salary then more_value+salary
                                  else salary+less_value
                                  end;
      END IF;
    END IF;
    return 'update success';
  END;

# 统计一个表中的记录总数数量
# input：表名
# output： 表中记录总数
drop FUNCTION  IF EXISTS countTableRecordsNum;
create function countTableRecordsNum(t_name VARCHAR(50))
  returns INTEGER(20) UNSIGNED
  begin
    DECLARE  num INTEGER;
    SELECT count(*) into num from t_name ;
    return num;
  END //


# 新增预约单
drop FUNCTION  IF EXISTS  addOrder;
create function addOrder(user_Name VARCHAR(50),server_Name VARCHAR(50), service_Name VARCHAR(50),time DATETIME)
  returns varchar(20)
  begin
    DECLARE V_AID,V_UID,V_SID INTEGER;
    select UID into V_UID from userInfo where name = user_Name;
    select AID into V_AID from assistInfo where name = server_Name;
    select SID into V_SID from service where name = service_Name;
    insert into orders(AID,UID,SID,userName,serverName,serviceName,appointmentTime)
          VALUES(V_AID,V_UID,V_SID,user_Name,server_Name,service_Name,time);
    return 'add order success';
  END //

DELIMITER ;

