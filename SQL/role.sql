use service_center;
#创建角色
create role IF NOT EXISTS 'role_root','all_user','role_admin','role_server','role_user','role_visitor';
#授予角色role_root所有权限
grant all on *.* to 'role_root';
#授予角色role_admin对所有现有数据表的增删查改权限
grant all privileges on service_center.* to 'role_admin';
#授予角色role_server对部分数据表的增删查改权限
grant update (password) on accounts to all_user;
grant 'all_user' to role_server;#服务人员也是一个用户
grant all privileges on userInfo to 'role_user';
grant select on assisInfo,works,salary to 'role_server';
grant select (regist,lastLogin,LoginTimes) on accounts to 'all_user';
#授予角色role_user对部分数据表的增删查改权限
grant 'all_user' to 'role_user';

#创建root用户，将角色role_root的权限赋给它
grant 'role_root' to root@localhost identified by 'root123';
#创建用户admin(n)，并赋给角色role_admin
grant 'role_admin' to admin1@localhost identified by '123456';

#创建用户server(n)，并赋给角色role_server
grant 'role_server' to server1@localhost identified by '123456';


#创建用户user(n)，并赋给角色role_user
grant 'role_user' to user1@"%" identified by '123456';

FLUSH PRIVILEGES; #刷新权限