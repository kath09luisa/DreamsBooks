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
    ])
    .addField('#advanced-usage_repeat-password', [
        {
          rule: 'required',
        },
        {
          validator: (value, fields) => {
            if (
              fields['#advanced-usage_password'] &&
              fields['#advanced-usage_password'].elem
            ) {
              const repeatPasswordValue =
                fields['#advanced-usage_password'].elem.value;
    
              return value === repeatPasswordValue;
            }
    
            return true;
          },
          errorMessage: 'Passwords should be the same',
        },
      ])
    .addField("#check_box_necessary", [
        {
            rule: 'required',
          },
          {
            errorsContainer: '#check_box_necessary-errors-container',
          }
    ]);
    