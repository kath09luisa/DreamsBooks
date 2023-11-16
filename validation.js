const validation = new JustValidate("#signup");

validation
    .addField("#nome", [
        {
            rule: "required"
        }
    ])
    .addField("#email", [
        {
            rule: "required"
        },
        {
            rule: "email"
        }
    ])
    .addField("#senha", [
        {
            rule: 'required',
          },
          {
            rule: 'password',
          }
    ]);
    